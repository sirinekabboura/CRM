import { Component, OnInit,ElementRef, ViewChild } from '@angular/core';

@Component({
  selector: 'app-ticket-details',
  templateUrl: './ticket-details.component.html',
  styleUrls: ['./ticket-details.component.scss']
})
export class TicketDetailsComponent implements OnInit {

  public contentHeader: object;
    // Decorator
    @ViewChild('scrollMe') scrollMe: ElementRef;
    scrolltop: number = null;
  

  constructor() {}
  
  // Lifecycle Hooks
  // -----------------------------------------------------------------------------------------------------
  
  /**
   * On init
   */
  ngOnInit() {
    this.contentHeader = {
      headerTitle: 'Tickets-details',
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
            name: 'Ticket',
            isLink: true,
            link: '/ticket'
          },
          {
            name: 'Ticket-details',
            isLink: false
          }
        ]
      }
    };
  }

}
