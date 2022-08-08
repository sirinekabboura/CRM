import { CoreMenu } from '@core/types'

export const menu: CoreMenu[] = [
  {
    id: 'home',
    title: 'Home',
    translate: 'MENU.HOME',
    type: 'item',
    icon: 'home',
    url: 'home'
  },
  /*{
    id: 'sample',
    title: 'Sample',
    translate: 'MENU.SAMPLE',
    type: 'item',
    icon: 'file',
    url: 'sample'
  },*/
  {
    id: 'personnels',
    title: 'personal',
    translate: 'Personnals',
    type: 'item',
    icon: 'user',
    url: 'personnels'
  },
  {
    id: 'client',
    title: 'client',
    translate: 'Clients',
    type: 'item',
    icon: 'users',
    url: 'client'
  },
  {
    id: 'projects',
    title: 'projects',
    translate: 'Projects',
    type: 'item',
    icon: 'folder',
    url: 'projects'
  }
  ,
  {
    id: 'taches',
    title: 'taches',
    translate: 'Taches',
    type: 'item',
    icon: 'check',
    url: 'taches'
  },
  {
    id: 'devis',
    title: 'devis',
    translate: 'Quotations',
    type: 'item',
    icon: 'file-text',
    url: 'devis'
  },
  {
    id: 'invoice',
    title: 'invoice',
    translate: 'Invoices',
    type: 'item',
    icon: 'file-plus',
    url: 'invoice'
  },
  {
    id: 'ticket',
    title: 'ticket',
    translate: 'Tickets',
    type: 'item',
    icon: 'bookmark',
    url: 'ticket'
  }
];
