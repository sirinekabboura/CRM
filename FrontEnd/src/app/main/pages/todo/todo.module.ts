import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { NgSelectModule } from '@ng-select/ng-select';
import { Ng2FlatpickrModule } from 'ng2-flatpickr';
import { PerfectScrollbarModule } from 'ngx-perfect-scrollbar';
import { QuillModule } from 'ngx-quill';

import { CoreSidebarModule } from '@core/components';
import { CoreCommonModule } from '@core/common.module';

import { TodoListComponent } from 'app/main/pages/todo//todo-list/todo-list.component';
import { TodoListItemComponent } from 'app/main/pages/todo//todo-list/todo-list-item/todo-list-item.component';
import { TodoMainSidebarComponent } from 'app/main/pages/todo//todo-sidebars/todo-main-sidebar/todo-main-sidebar.component';
import { TodoRightSidebarComponent } from 'app/main/pages/todo//todo-sidebars/todo-right-sidebar/todo-right-sidebar.component';

import { TodoComponent } from 'app/main/pages/todo//todo.component';
import { SoustacheComponent } from './soustache/soustache.component';
import { TachesCommentsComponent } from './taches-comments/taches-comments.component';
import { TacheDetaillesComponent } from './tache-detailles/tache-detailles.component';

// routing
const routes: Routes = [
  {
    path: ':filter',
    component: TodoComponent,
    resolve: {
    }
  },
  {
    path: 'tag/:tag',
    component: TodoComponent,
    resolve: {
    }
  },
  {
    path: '**',
    redirectTo: 'all',
    data: { animation: 'todo' }
  }
];

@NgModule({
  declarations: [
    TodoComponent,
    TodoListComponent,
    TodoMainSidebarComponent,
    TodoRightSidebarComponent,
    TodoListItemComponent,
    SoustacheComponent,
    TachesCommentsComponent,
    TacheDetaillesComponent
  ],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    CoreCommonModule,
    CoreSidebarModule,
    QuillModule.forRoot(),
    NgSelectModule,
    NgbModule,
    Ng2FlatpickrModule,
    PerfectScrollbarModule
  ],
  providers: []
})
export class TodoModule {}
