import { Component, OnInit } from '@angular/core';
import { Router} from '@angular/router';

import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';

import { TodoService } from 'app/main/pages/todo/todo.service';

@Component({
  selector: 'app-todo-main-sidebar',
  templateUrl: './todo-main-sidebar.component.html'
})
export class TodoMainSidebarComponent implements OnInit {
  // Public
  public filters: Array<{}>;
  public tags: Array<{}>;

  /**
   * Constructor
   *
   * 
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor(private _coreSidebarService: CoreSidebarService,private router : Router) {}

  // Public Methods
  // -----------------------------------------------------------------------------------------------------

  /**
   * Toggle Sidebar
   *
   * @param nameRef
   */
  createNewTodo(nameRef, closeNameRef): void {
    this._coreSidebarService.getSidebarRegistry(nameRef).toggleOpen();
    this._coreSidebarService.getSidebarRegistry(closeNameRef).toggleOpen();
   // this._todoService.createNewTodo();
  }

  /**
   * Toggle Sidebar
   *
   * @param nameRef
   */
  toggleSidebar(nameRef): void {
    this._coreSidebarService.getSidebarRegistry(nameRef).toggleOpen();
  }

  // Lifecycle Hooks
  // -----------------------------------------------------------------------------------------------------
  /**
   * On init
   */
  ngOnInit(): void {
    //this._todoService.onFiltersChange.subscribe(response => (this.filters = response));
    //this._todoService.onTagsChange.subscribe(response => (this.tags = response));
  }
  AllTasks(){
    this.router.navigateByUrl('taches/all')
  }
  //Jquery
  Completed(){
    $('#TC').addClass('active');
    $('#TA').removeClass('active');
    $('#TI').removeClass('active');
  }
  Important(){
    $('#TI').addClass('active');
    $('#TA').removeClass('active');
    $('#TC').removeClass('active');
  }
  All(){
    $('#TA').addClass('active');
    $('#TC').removeClass('active');
    $('#TI').removeClass('active');
  }
}
