import { Component, OnInit, OnDestroy, ViewEncapsulation, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgForm } from '@angular/forms';

import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';
import { FlatpickrOptions } from 'ng2-flatpickr';
import { cloneDeep } from 'lodash';

import { PersonnelsEditService } from 'app/main/sample/personnels/personnels-edit/personnels-edit.service';
import { PersonnelsService } from 'app/services/personnels.service';
import { data } from 'jquery';
import { Toast, ToastrModule, ToastrService } from 'ngx-toastr';
@Component({
  selector: 'app-personnels-edit',
  templateUrl: './personnels-edit.component.html',
  styleUrls: ['./personnels-edit.component.scss']
})
export class PersonnelsEditComponent implements OnInit, OnDestroy {
 // Public
 public url = this.router.url;
 personnelId: any;
 personnel: any;
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
  personnels: any;

 /**
  * Constructor
  *
  * @param {Router} router
  */
 constructor(
  private toastr: ToastrService,
  private route: ActivatedRoute,
    private router: Router, 
    private personnelsEdit: PersonnelsService) {
   this._unsubscribeAll = new Subject();
   this.urlLastValue = this.url.substr(this.url.lastIndexOf('/') + 1);
   //this.showSuccess();
 }


 showSuccess(){
  this.toastr.success('hi','great');
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
  const routeParams = this.route.snapshot.paramMap;
  this.personnelId = Number(routeParams.get('personnelId'));
   console.log(this.personnelId); 
  
   this.personnel=this.personnelsEdit.find(this.personnelId).subscribe((data: any)=>{
    this.personnel= data;
    console.log(this.personnel);

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

 update(name: string,email: string,Numtelephone: string,CarteID: number,Role: string,Salaire:number,Adresse: string)
 {
  this.personnel= {
    'name':name,
    'email':email,
    'Numtelephone':Numtelephone,
    'CarteID':CarteID,
    'Role':Role,
    'Salaire':Salaire,
    'Adresse':Adresse
  }
    this.personnelsEdit.update(this.personnelId,this.personnel).subscribe((res)=>{
      var r :any=res;
      this.toastr.success(r.message,'personnal modified with Success');
      this.router.navigateByUrl('/personnels');
      //this.fetchData();
    });
 }

 fetchData() {
  this.personnel = this.personnelsEdit.listPersonnels().subscribe(
    personnel=>{
      
      this.personnel= personnel;
      console.log(this.personnel);
    }
  );
}
}
