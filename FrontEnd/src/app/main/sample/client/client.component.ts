import { Component, OnInit, ViewChild } from '@angular/core';
import {   ViewEncapsulation } from '@angular/core';
import { ColumnMode, DatatableComponent } from '@swimlane/ngx-datatable';

import { Subject } from 'rxjs';
import { takeUntil } from 'rxjs/operators';

import { CoreConfigService } from '@core/services/config.service';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';

//import { PersonnelsService } from 'app/main/sample/personnels/personnels.service';
import {ClientsService} from 'app/services/clients.service';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';

declare var window:any;

@Component({
  selector: 'app-client',
  templateUrl: './client.component.html',
  styleUrls: ['./client.component.scss']
})
export class ClientComponent implements OnInit {
  public sidebarToggleRef = false;
  private _unsubscribeAll: Subject<any>;
  public contentHeader: object 
  @ViewChild(DatatableComponent) table: DatatableComponent;
  clients: any;

/**
* Constructor
*
* @param {CoreConfigService} _coreConfigService
* @param {ClientsService} _clientService
* @param {CoreSidebarService} _coreSidebarService
*/
constructor(
  private router: Router, 
    private toastr: ToastrService,
private _clientService: ClientsService,
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

  this.fetchData();
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
fetchData() {
  this.clients = this._clientService.listClients().subscribe(
    client=>{
      this.clients= client;
      console.log(this.clients);
    }
  );
}

delete(id:any)
  {
    this.clients=this._clientService.delete(id).subscribe(
      res=>{
        var r :any=res;
        this.toastr.info(r.message,'Client removed with success');
    this.clients= this.fetchData();
    }
    );
  }

}
