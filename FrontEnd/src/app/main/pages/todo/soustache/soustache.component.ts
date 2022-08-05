import { Component, OnInit, ViewEncapsulation, ElementRef, ViewChild } from '@angular/core';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import $ from 'jquery';
@Component({
  selector: 'app-soustache',
  templateUrl: './soustache.component.html',
  styleUrls: ['./soustache.component.scss'],
  encapsulation: ViewEncapsulation.None
})
export class SoustacheComponent implements OnInit {

 /**
   * Constructor
   *
   * 
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor(private _coreSidebarService: CoreSidebarService) { }
 /**
   * Close Sidebar
   */
  commentaire:any
  public listtaches=true;
  public ajoutertache
  closeSidebar() {
    this._coreSidebarService.getSidebarRegistry('soustache').toggleOpen();
  }
  ngOnInit(): void {
    $('#comments').show();
    $('#AjouterSousTache').hide();
  }

  //show commentaire
  showCommentaire(){
    $('#comments').show();
    $('#AjouterSousTache').hide();
  }
  //show ajouter
  showAjouter(){
    $('#comments').hide();
    $('#AjouterSousTache').show();
  }
}
