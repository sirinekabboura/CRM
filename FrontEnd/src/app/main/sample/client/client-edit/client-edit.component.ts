import { Component, OnInit, OnDestroy, ViewEncapsulation, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { NgForm } from '@angular/forms';

import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';
import { FlatpickrOptions } from 'ng2-flatpickr';
import { cloneDeep } from 'lodash';
import { ToastrService } from 'ngx-toastr';
import { ClientsService } from 'app/services/clients.service';
@Component({
  selector: 'app-client-edit',
  templateUrl: './client-edit.component.html',
  styleUrls: ['./client-edit.component.scss']
})
export class ClientEditComponent implements OnInit {

  // Public
  clientId: any;
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
  client: any;

 /**
  * Constructor
  *
  * @param {Router} router
  */
 constructor(
  private toastr: ToastrService,
  private route: ActivatedRoute,
    private router: Router, 
    private clientEdit: ClientsService) {
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
  const routeParams = this.route.snapshot.paramMap;
  this.clientId = Number(routeParams.get('clientId'));
   console.log(this.clientId); 
  
   this.client=this.clientEdit.find(this.clientId).subscribe((data: any)=>{
    this.client= data;
    console.log(this.client);

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


 update(name: string,email: string,Numtelephone: string,RaisonSociale: String,RNE:String,Adresse: string)
 {
  this.client= {
    'name':name,
    'email':email,
    'Numtelephone':Numtelephone,
    'RaisonSociale': RaisonSociale,
    'RNE': RNE,
    'Adresse': Adresse,
  }
    this.clientEdit.update(this.clientId,this.client).subscribe((res)=>{
      var r :any=res;
      this.toastr.success(r.message,'client modified with Success');
      this.router.navigateByUrl('/client');
      //this.fetchData();
    });
 }

 fetchData() {
  this.client = this.clientEdit.listClients().subscribe(
    client=>{
      this.client= client;
      console.log(this.client);
    }
  );
}
}
