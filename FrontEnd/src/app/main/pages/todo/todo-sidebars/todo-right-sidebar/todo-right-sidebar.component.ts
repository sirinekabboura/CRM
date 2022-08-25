import { Component, OnInit, ViewEncapsulation, ElementRef, ViewChild } from '@angular/core';
import { Router } from '@angular/router';

import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import { TachesService } from '@core/services/taches.service';
import { Taches } from '@core/taches';
import { AuthenticationService } from 'app/auth/services';

import { Todo } from 'app/main/pages/todo/todo.model';
import { Console } from 'console';
import Swal from 'sweetalert2';
import { TacheDetaillesComponent } from '../../tache-detailles/tache-detailles.component';
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
  public tache:Taches;
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
  constructor( private _coreSidebarService: CoreSidebarService,private router:Router,private PS:TachesService,private us:AuthenticationService) {
    this.tache=new Taches();
  }

  // Public Methods
  // -----------------------------------------------------------------------------------------------------

  /**
   * Close Sidebar
   */
 
   AjouterTache() {
    this.tache.file="Not Yet Ready";
    this.tache.image="Not Yet Ready";
    this.tache.soustache_id="Does Not Have Sous Tache";
    this.tache.assignation=this.tache.assignation.id;
    console.log(this.tache)
    this.PS.save(this.tache).subscribe(
      (data: any) => {
        Swal.fire({
          title: '<strong>Success!</strong>',
          icon: 'success',
          html:
            '<b>Congratulations !</b> You Added The Task '
        }
        )
        console.log(data)
        this.router.navigateByUrl('/taches/all')
      },
      (error) => {
        Swal.fire({
          title: '<strong>Error!</strong>',
          icon: 'error',
          html:
            '<b>Something Is Wrong !</b> Check '
        }
        )
        console.log(error)
      }
    );
  }
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
this.us.FindAll().subscribe(
  (data: any) => {
    this.selectAssignee=data.users;
    console.log("Liste des assignés")
    console.log(this.selectAssignee)
  }
)
    
  }
}
