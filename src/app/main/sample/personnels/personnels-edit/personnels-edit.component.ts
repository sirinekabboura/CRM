import { Component, OnInit, OnDestroy, ViewEncapsulation, ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { NgForm } from '@angular/forms';

import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';
import { FlatpickrOptions } from 'ng2-flatpickr';
import { cloneDeep } from 'lodash';

import { PersonnelsEditService } from 'app/main/sample/personnels/personnels-edit/personnels-edit.service';
@Component({
  selector: 'app-personnels-edit',
  templateUrl: './personnels-edit.component.html',
  styleUrls: ['./personnels-edit.component.scss']
})
export class PersonnelsEditComponent implements OnInit, OnDestroy {
 // Public
 public url = this.router.url;
 public urlLastValue;
 public rows;
 public currentRow;
 public tempRow;
 public avatarImage: string;

 @ViewChild('accountForm') accountForm: NgForm;

 public birthDateOptions: FlatpickrOptions = {
   altInput: true
 };

 public selectMultiLanguages = ['English', 'Spanish', 'French', 'Russian', 'German', 'Arabic', 'Sanskrit'];
 public selectMultiLanguagesSelected = [];

 // Private
 private _unsubscribeAll: Subject<any>;

 /**
  * Constructor
  *
  * @param {Router} router
  * @param {PersonnelsEditService} _userEditService
  */
 constructor(private router: Router, private _userEditService: PersonnelsEditService) {
   this._unsubscribeAll = new Subject();
   this.urlLastValue = this.url.substr(this.url.lastIndexOf('/') + 1);
 }

 // Public Methods
 // -----------------------------------------------------------------------------------------------------

 /**
  * Reset Form With Default Values
  */
 resetFormWithDefaultValues() {
   this.accountForm.resetForm(this.tempRow);
 }

 /**
  * Upload Image
  *
  * @param event
  */
 uploadImage(event: any) {
   if (event.target.files && event.target.files[0]) {
     let reader = new FileReader();

     reader.onload = (event: any) => {
       this.avatarImage = event.target.result;
     };

     reader.readAsDataURL(event.target.files[0]);
   }
 }

 /**
  * Submit
  *
  * @param form
  */
 submit(form) {
   if (form.valid) {
     console.log('Submitted...!');
   }
 }

 // Lifecycle Hooks
 // -----------------------------------------------------------------------------------------------------
 /**
  * On init
  */
 ngOnInit(): void {
   this._userEditService.onUserEditChanged.pipe(takeUntil(this._unsubscribeAll)).subscribe(response => {
     this.rows = response;
     this.rows.map(row => {
       if (row.id == this.urlLastValue) {
         this.currentRow = row;
         this.avatarImage = this.currentRow.avatar;
         this.tempRow = cloneDeep(row);
       }
     });
   });
 }

 /**
  * On destroy
  */
 ngOnDestroy(): void {
   // Unsubscribe from all subscriptions
   this._unsubscribeAll.next();
   this._unsubscribeAll.complete();
 }
}
