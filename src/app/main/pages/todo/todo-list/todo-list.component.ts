import { Component, OnInit } from '@angular/core';
//import { DragulaService } from 'ng2-dragula';

import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import { TachesService } from '@core/services/taches.service';

import { Todo } from 'app/main/pages/todo//todo.model';
import { TodoService } from 'app/main/pages/todo//todo.service';

@Component({
  selector: 'app-todo-list',
  templateUrl: './todo-list.component.html',
  styleUrls: ['./todo-list-component.scss']

})
export class TodoListComponent implements OnInit {
  // Public
  public todos: Todo[];
  ListTaches
  /**
   * Constructor
   *
   * 
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor(
    //private _dragulaService: DragulaService,
    private _coreSidebarService: CoreSidebarService,private ts:TachesService
  ) {
    // Drag And Drop With Handle
   // _dragulaService.destroy('todo-tasks-drag-area');
   /* _dragulaService.createGroup('todo-tasks-drag-area', {
      moves: function (el, container, handle) {
        return handle.classList.contains('drag-icon');
      }
    });*/
  }

  // Public Methods
  // -----------------------------------------------------------------------------------------------------

  /**
   * Toggle Sidebar
   *
   * @param nameRef
   */
  toggleSidebar(nameRef): void {
    this._coreSidebarService.getSidebarRegistry(nameRef).toggleOpen();
  }

  /**
   * Update Sort
   *
   * @param sortRef
   */
  updateSort(sortRef) {
    //this._todoService.sortTodos(sortRef);
  }

  /**
   * Update Query
   *
   * @param queryRef
   */
  updateQuery(queryRef) {
    //this._todoService.getTodosBySearch(queryRef.target.value);
  }

  openDetailles(id) {
    this._coreSidebarService.changeMessage(id);
    //this._coreSidebarService.Testeur('TacheDetailles',id).toggleOpen();
    this._coreSidebarService.getSidebarRegistry('TacheDetailles').toggleOpen();
  }
  
  openComments(){
    this._coreSidebarService.getSidebarRegistry('comments').toggleOpen();
  }
  openSousTaches(id){
    this._coreSidebarService.changeMessage(id);
    this._coreSidebarService.getSidebarRegistry('soustache').toggleOpen();
  }
  DeleteTache(id:number){
    this.ts.DeleteTache(id).subscribe(data=>{
      this.ts.FindAllTaches().subscribe(data=>{
        this.ListTaches=data.taches;
      })
    }
    )
  }
  // Lifecycle Hooks
  // -----------------------------------------------------------------------------------------------------
  /**
   * On init
   */
  ngOnInit(): void {
    this.ts.FindAllTaches().subscribe(data=>{
      this.ListTaches=data.taches;
    })
    // Subscribe Todos change
   // this._todoService.onTodoDataChange.subscribe(response => (this.todos = response));
  }
}
