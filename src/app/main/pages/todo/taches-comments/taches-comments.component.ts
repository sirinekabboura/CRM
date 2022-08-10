import { Component, OnInit } from '@angular/core';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';

@Component({
  selector: 'app-taches-comments',
  templateUrl: './taches-comments.component.html',
  styleUrls: ['./taches-comments.component.scss']
})
export class TachesCommentsComponent implements OnInit {
 /**
   * Constructor
   *
   * 
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor(private _coreSidebarService: CoreSidebarService) { }
  commentaire:any
  ngOnInit(): void {
  }
  closeSidebar() {
    this._coreSidebarService.getSidebarRegistry('soustache').toggleOpen();
  }
}
