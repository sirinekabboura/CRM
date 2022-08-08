import { Component, OnInit, ViewChild } from '@angular/core';
import {   ViewEncapsulation } from '@angular/core';
import { ColumnMode, DatatableComponent } from '@swimlane/ngx-datatable';

import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';

import { CoreConfigService } from '@core/services/config.service';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';

//import { PersonnelsService } from 'app/main/sample/personnels/personnels.service';
import {PersonnelsService} from 'app/services/personnels.service';

declare var window:any;

@Component({
  selector: 'app-client',
  templateUrl: './client.component.html',
  styleUrls: ['./client.component.scss']
})
export class ClientComponent implements OnInit {
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
    headerTitle: 'Clients',
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
          name: 'Clients',
          isLink: false,
          link: '/client'
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


}
