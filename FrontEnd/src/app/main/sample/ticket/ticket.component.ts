import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-ticket',
  templateUrl: './ticket.component.html',
  styleUrls: ['./ticket.component.scss']
})
export class TicketComponent implements OnInit {
// public
public contentHeader: object;

constructor() {}

// Lifecycle Hooks
// -----------------------------------------------------------------------------------------------------

/**
 * On init
 */
ngOnInit() {
  this.contentHeader = {
    headerTitle: 'Tickets',
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
          name: 'Tickets',
          isLink: false,
          link: '/ticket'
        }
      ]
    }
  };
}
}
