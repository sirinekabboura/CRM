import { Component, OnDestroy, OnInit, ViewEncapsulation } from '@angular/core';
import { Router } from '@angular/router';

import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';

import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';

import { FacturePreviewService } from './facture-preview.service';
import { DatePipe } from '@angular/common';
@Component({
  selector: 'app-facture-preview',
  templateUrl: './facture-preview.component.html',
  styleUrls: ['./facture-preview.component.scss']
})
export class FacturePreviewComponent implements OnInit, OnDestroy {
   // public
   public apiData;
   public urlLastValue;
   public url = this.router.url;
   public sidebarToggleRef = false;
   public paymentSidebarToggle = false;
   public paymentDetails = {
     totalDue: '$12,110.55',
     bankName: 'American Bank',
     country: 'United States',
     iban: 'ETD95476213874685',
     swiftCode: 'BR91905'
   };
 
   // private
   private _unsubscribeAll: Subject<any>;
 
   /**
    * Constructor
    *
    * @param {Router} router
    * @param {DevisPreviewService} _invoicePreviewService
    * @param {CoreSidebarService} _coreSidebarService
    */
   constructor(
     private router: Router,
     private _invoicePreviewService: FacturePreviewService,
     private _coreSidebarService: CoreSidebarService
   ) {
     this._unsubscribeAll = new Subject();
     this.urlLastValue = this.url.substr(this.url.lastIndexOf('/') + 1);
   }
 
   // Public Methods
   // -----------------------------------------------------------------------------------------------------
 
   /**
    * Toggle the sidebar
    *
    * @param name
    */
   toggleSidebar(name): void {
     this._coreSidebarService.getSidebarRegistry(name).toggleOpen();
   }
   today: Date = new Date();
   pipe = new DatePipe('en-US');
   todayWithPipe = null;
   public datedd;
   // Lifecycle Hooks
   // -----------------------------------------------------------------------------------------------------
   /**
    * On init
    */
   ngOnInit(): void {
     this._invoicePreviewService.onInvoicPreviewChanged.pipe(takeUntil(this._unsubscribeAll)).subscribe(response => {
       this.apiData = response;
     });
     this.datedd=this.pipe.transform(Date.now(), 'dd/MM/yyyy');
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
