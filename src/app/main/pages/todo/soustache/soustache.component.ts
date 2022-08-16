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
    $('#soustaches').show();
    $('#comments').hide();
    $('#AjouterSousTache').hide();
    $('#DetailleSousTache').hide();
  }
  //show commentaires
  showCommentaires(){
    $('#comments').show();
    $('#soustaches').hide();
    $('#AjouterSousTache').hide();
    $('#DetailleSousTache').hide();
    //
    $('#TC').addClass('active');
    $('#TA').removeClass('active');
    $('#TS').removeClass('active');
  }
  //show soustaches
  showSousTaches(){
    $('#soustaches').show();
    $('#comments').hide();
    $('#AjouterSousTache').hide();
    $('#DetailleSousTache').hide();
    //
    $('#TS').addClass('active');
    $('#TC').removeClass('active');
    $('#TA').removeClass('active');
  }
  //show ajouter
  showAjouter(){
    $('#soustaches').hide();
    $('#comments').hide();
    $('#AjouterSousTache').show();
    $('#DetailleSousTache').hide();
    //
    $('#TA').addClass('active');
    $('#TC').removeClass('active');
    $('#TS').removeClass('active');
  }
  showDetailleSousTache(){
    $('#DetailleSousTache').show();
    $('#soustaches').hide();
    $('#comments').hide();
    $('#AjouterSousTache').hide();
  }
  HideDetailleSousTache(){
    $('#soustaches').show();
    $('#comments').hide();
    $('#AjouterSousTache').hide();
    $('#DetailleSousTache').hide();
  }
}
