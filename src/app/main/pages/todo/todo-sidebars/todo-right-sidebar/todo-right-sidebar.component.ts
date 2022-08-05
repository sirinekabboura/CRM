import { Component, OnInit, ViewEncapsulation, ElementRef, ViewChild } from '@angular/core';

import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';

import { Todo } from 'app/main/pages/todo/todo.model';
//import { TodoService } from 'app/main/pages/todo/todo.service';

@Component({
  selector: 'app-todo-right-sidebar',
  templateUrl: './todo-right-sidebar.component.html',
  styleUrls: ['./todo-right-side.scss'],
  encapsulation: ViewEncapsulation.None
})
export class TodoRightSidebarComponent implements OnInit {
  // Public
  public isDataEmpty;
  public todo: Todo;
  public tags;
  public selectTags;
  public selectAssignee;
  ajouter=true
  commentaire=false;
  public soustache=true;
  @ViewChild('dueDateRef') private dueDateRef: any;

  public dueDateOptions = {
    altInput: true,
    mode: 'single',
    altInputClass: 'form-control flat-picker flatpickr-input invoice-edit-input',
    altFormat: 'F j, Y',
    dateFormat: 'Y-m-d'
  };

  /**
   * Constructor
   *
   * 
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor( private _coreSidebarService: CoreSidebarService) {}

  // Public Methods
  // -----------------------------------------------------------------------------------------------------

  /**
   * Close Sidebar
   */
  closeSidebar() {
    this._coreSidebarService.getSidebarRegistry('todo-sidebar-right').toggleOpen();
  }
  //show commentaire
  showCommentaire(){
    this.commentaire=true;
    this.ajouter=false;
  }
  //show ajouter
  showAjouter(){
    this.commentaire=false;
    this.ajouter=true;
  }
  /**
   * Update Todo
   */
  updateTodo() {
    //! Fix: Temp fix till ng2-flatpicker support ng-modal (Getting NG0100: Expression has changed after it was checked error if we use ng-model with ng2-flatpicker)
    this.todo.dueDate = this.dueDateRef.flatpickrElement.nativeElement.children[0].value;

    //this._todoService.updateCurrentTodo(this.todo);
    this.closeSidebar();
  }

  /**
   * Add Todo
   */
  addTodo(todoForm) {
    if (todoForm.valid) {
      //! Fix: Temp fix till ng2-flatpicker support ng-modal
      this.todo.dueDate = this.dueDateRef.flatpickrElement.nativeElement.children[0].value;
     // this._todoService.updateCurrentTodo(this.todo);
      this.closeSidebar();
    }
  }

  /**
   * Delete Todo
   */
  deleteTodo() {
    this.todo.deleted = !this.todo.deleted;
   // this._todoService.updateCurrentTodo(this.todo);
    this.closeSidebar();
  }

  /**
   * Toggle Complete
   */
  toggleComplete() {
    this.todo.completed = !this.todo.completed;
    //this._todoService.updateCurrentTodo(this.todo);
    this.closeSidebar();
  }

  /**
   * Toggle Important
   */
  toggleImportant() {
    this.todo.important = !this.todo.important;
    //this._todoService.updateCurrentTodo(this.todo);
    this.closeSidebar();
  }

  // Lifecycle Hooks
  // -----------------------------------------------------------------------------------------------------

  /**
   * On init
   */
  ngOnInit(): void {
    this.selectAssignee=[{id:1,name:'John Doe'},{id:2,name:'Jane Doe'}];
    /*this._todoService.onCurrentTodoChange.subscribe(response => {
      if (Object.keys(response).length > 0) {
        this.todo = response;
        this.isDataEmpty = false;
      } else {
        this.todo = new Todo();

        this.isDataEmpty = true;
      }
    });
    this._todoService.onTagsChange.subscribe(response => {
      this.selectTags = response.map(tagRef => {
        return tagRef.handle;
      });
    });

    this._todoService.onAssigneeChange.subscribe(assigneeRef => {
      this.selectAssignee = assigneeRef;
    });*/
  }
}
