import { Component, OnInit } from '@angular/core';
import {  ViewChild, ViewEncapsulation } from '@angular/core';
import { ColumnMode, DatatableComponent } from '@swimlane/ngx-datatable';

import { Toast, ToastrModule, ToastrService } from 'ngx-toastr';

import { Subject } from 'rxjs';
import { first, takeUntil } from 'rxjs/operators';

import { CoreConfigService } from '@core/services/config.service';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';

//import { PersonnelsService } from 'app/main/sample/personnels/personnels.service';
import {PersonnelsService} from 'app/services/personnels.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-personnels',
  templateUrl: './personnels.component.html',
  styleUrls: ['./personnels.component.scss'],

})
export class PersonnelsComponent implements OnInit {
  
      personnels: any;
      users: any;
      public sidebarToggleRef = false;
      private _unsubscribeAll: Subject<any>;
      public contentHeader: object 
      @ViewChild(DatatableComponent) table: DatatableComponent;
      public toast: Toast;
  personneld: any;

  /**
   * Constructor
   *
   * @param {CoreConfigService} _coreConfigService
   * @param {PersonnelsService} _personnelService
   * @param {CoreSidebarService} _coreSidebarService
   */
   constructor(
    private router: Router, 
    private toastr: ToastrService,
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
   
   this.fetchData();
      
      this.contentHeader = {
        headerTitle: 'Personnals',
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
              name: 'Personnals',
              isLink: false,
              link: '/personnels'
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
  delete(id:any)
  {
    //this.personneld = this.personnels.filter((a:any)=> a.id == id);
    this.personnels=this._personnelService.delete(id).subscribe(
      res=>{
        var r :any=res;
        this.toastr.info(r.message,'Personnal removed with success');
    this.personnels= this.fetchData();
    }
    );
    //this.router.
    //this.fetchData();

  }

  fetchData() {
    this.personnels = this._personnelService.listPersonnels().subscribe(
      personnel=>{
        this.users= this._personnelService.listUsers().subscribe(
          user=>{
            this.users= user;
            console.log(this.users);
          }
        );
        this.personnels= personnel;
        console.log(this.personnels);
      }
    );
  }

  
}
