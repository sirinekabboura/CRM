import { Component, OnInit, ViewChild } from '@angular/core';
import {   ViewEncapsulation } from '@angular/core';
import { ColumnMode, DatatableComponent } from '@swimlane/ngx-datatable';

import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';

import { CoreConfigService } from '@core/services/config.service';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';

//import { PersonnelsService } from 'app/main/sample/personnels/personnels.service';
import {PersonnelsService} from 'app/services/personnels.service';
import { ItemsList } from '@ng-select/ng-select/lib/items-list';


@Component({
  selector: 'app-devis',
  templateUrl: './devis.component.html',
  styleUrls: ['./devis.component.scss']
})
export class DevisComponent implements OnInit {
  public items = [{ itemId: '', itemName: '',  itemCost: '' }];

  public item = {
    itemName: '',
    itemQuantity: '',
    itemCost: ''
  };
  personnels: any;
  public sidebarToggleRef = false;
  private _unsubscribeAll: Subject<any>;
  public contentHeader: object 
  @ViewChild(DatatableComponent) table: DatatableComponent;

/**
* Constructor
*
* @param {CoreConfigService} _coreConfigService
* @param {PersonnelsService} _personnelService
* @param {CoreSidebarService} _coreSidebarService
*/
constructor(
private _personnelService: PersonnelsService,
private _coreSidebarService: CoreSidebarService,
private _coreConfigService: CoreConfigService
) {
this._unsubscribeAll = new Subject();
}
/**
* Toggle the sidebar
*
* @param name
*/
toggleSidebar(name): void {
this._coreSidebarService.getSidebarRegistry(name).toggleOpen();
}




ngOnInit(): void {
  this.personnels = this._personnelService.listPersonnels().subscribe(
    personnel=>{
      this.personnels= personnel;
      console.log(this.personnels);
    }
  );

  this.contentHeader = {
    headerTitle: 'Quotations',
    actionButton: true,
    breadcrumb: {
      type: '',
      links: [
        {
          name: 'Home',
          isLink: true,
          link: '/'
        },
        {
          name: 'Quotations',
          isLink: false,
          link: '/devis'
        }
      ]
    }
  };
}

/**
* On destroy
*/
ngOnDestroy(): void {
// Unsubscribe from all subscriptions
this._unsubscribeAll.next();
this._unsubscribeAll.complete();
}

eEditable= -1; //-1 by default. It doesn't match any $index from ng-repeat


}
