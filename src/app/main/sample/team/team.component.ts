import {Component, OnInit, ViewChild} from '@angular/core';
import {Subject} from "rxjs";
import {DatatableComponent} from "@swimlane/ngx-datatable";
import {PersonnelsService} from "../../../services/personnels.service";
import {CoreSidebarService} from "../../../../@core/components/core-sidebar/core-sidebar.service";
import {CoreConfigService} from "../../../../@core/services/config.service";

@Component({
  selector: 'app-team',
  templateUrl: './team.component.html',
  styleUrls: ['./team.component.scss']
})
export class TeamComponent implements OnInit {
  team: any;
  public sidebarToggleRef = false;
  private _unsubscribeAll: Subject<any>;
  public contentHeader: object
  @ViewChild(DatatableComponent) table: DatatableComponent;

  constructor(
      private _teamService: PersonnelsService,
      private _coreSidebarService: CoreSidebarService,
      private _coreConfigService: CoreConfigService
  ) {     this._unsubscribeAll = new Subject();
  }
  toggleSidebar(name): void {
    this._coreSidebarService.getSidebarRegistry(name).toggleOpen();
  }


  ngOnInit(): void {
    this.team = this._teamService.listPersonnels().subscribe(
        team=>{
          this.team= team;
          console.log(this.team);
        }
    );
  }
  ngOnDestroy(): void {
    // Unsubscribe from all subscriptions
    this._unsubscribeAll.next();
    this._unsubscribeAll.complete();
  }
}
