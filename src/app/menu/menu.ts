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
    translate: 'Personnal',
    type: 'item',
    icon: 'user',
    url: 'personnels'
  },
  {
    id: 'team',
    title: 'team',
    translate: 'Team',
    type: 'item',
    icon: 'user',
    url: 'team'
  },
  {
    id: 'client',
    title: 'client',
    translate: 'Client',
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


];
