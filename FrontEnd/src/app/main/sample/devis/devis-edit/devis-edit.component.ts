import { Component, OnInit } from '@angular/core';
import {  OnDestroy,  ViewEncapsulation } from '@angular/core';

import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';

import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';

import {DatePipe} from '@angular/common'

import {formatDate} from '@angular/common';

//import { repeaterAnimation } from 'app/main/forms/form-repeater/form-repeater.animation';
import { DevisEditService } from 'app/main/sample/devis/devis-edit/devis-edit.service';
@Component({
  selector: 'app-devis-edit',
  templateUrl: './devis-edit.component.html',
  styleUrls: ['./devis-edit.component.scss']
})
export class DevisEditComponent implements OnInit, OnDestroy {
// public
//public myDate = this.datepipe.transform(new Date(), 'yyyy-MM-dd');
public apiData;
public sidebarToggleRef = false;
public invoiceSelect;
public invoiceSelected;

public paymentDetails = {
  totalDue: '$12,110.55',
  bankName: 'American Bank',
  country: 'United States',
  iban: 'ETD95476213874685',
  swiftCode: 'BR91905'
};

public items = [{ itemId: '', itemName: '',  itemCost: '' }];

public item = {
  itemName: '',
  itemQuantity: '',
  itemCost: ''
};

// ng2-flatpickr options
public dateOptions = {
  altInput: true,
  mode: 'single',
  altInputClass: 'form-control flat-picker flatpickr-input',
  defaultDate: ['2020-05-01'],
  altFormat: 'Y-n-j'
};

public dated=new Date();


// Private
private _unsubscribeAll: Subject<any>;

/**
 * Constructor
 *
 * @param {DevisEditService} _invoiceAddService
 * @param {CoreSidebarService} _coreSidebarService
 */
constructor(private _invoiceAddService: DevisEditService, private _coreSidebarService: CoreSidebarService) {
  this._unsubscribeAll = new Subject();
}

// Public Methods
// -----------------------------------------------------------------------------------------------------

/**
 * Add Item
 */
addItem() {
  this.items.push({
    itemId: '',
    itemName: '',
    itemCost: ''
  });
}

/**
 * DeleteItem
 *
 * @param id
 */
deleteItem(id) {
  for (let i = 0; i < this.items.length; i++) {
    if (this.items.indexOf(this.items[i]) === id) {
      this.items.splice(i, 1);
      break;
    }
  }
}

/**
 * Toggle Sidebar
 *
 * @param name
 */
toggleSidebar(name) {
  this._coreSidebarService.getSidebarRegistry(name).toggleOpen();
}

// Lifecycle Hooks
// -----------------------------------------------------------------------------------------------------
/**
 * On init
 */

 today: Date = new Date();
 pipe = new DatePipe('en-US');
 todayWithPipe = null;
 
ngOnInit(): void {
  this.todayWithPipe = this.pipe.transform(Date.now(), 'yyyy-MM-dd');
  this._invoiceAddService.onInvoicAddChanged.pipe(takeUntil(this._unsubscribeAll)).subscribe(response => {
    let responseData = response;
    this.apiData = responseData.slice(5, 10);
  });
  this.invoiceSelect = this.apiData;
  this.invoiceSelected = this.invoiceSelect;
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
