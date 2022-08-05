import { Component, Input, OnInit } from '@angular/core';

import { Todo } from 'app/main/pages/todo//todo.model';
//import { TodoService } from 'app/main/pages/todo//todo.service';

@Component({
  selector: 'app-todo-list-item',
  templateUrl: './todo-list-item.component.html'
})
export class TodoListItemComponent implements OnInit {
  // Input Decorator
  @Input() todo: Todo;

  // Public
  public selected;

  /**
   * Constructor
   *
   * 
   */
  constructor() {}

  /**
   *
   * @param stateRef
   */
  checkboxStateChange(stateRef) {
    this.todo.completed = stateRef;
    //this._todoService.updateCurrentTodo(this.todo);
  }

  ngOnInit(): void {}
}
