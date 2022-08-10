import { Component, OnInit, ViewChild } from '@angular/core';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import { Todo } from '../todo.model';

@Component({
  selector: 'app-tache-detailles',
  templateUrl: './tache-detailles.component.html',
  styleUrls: ['./tache-detailles.component.scss']
})
export class TacheDetaillesComponent implements OnInit {
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
   this._coreSidebarService.getSidebarRegistry('TacheDetailles').toggleOpen();
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
   this.todo.dueDate = this.dueDateRef.flatpickrElement.nativeElement.children[0].value;

   this.closeSidebar();
 }

 /**
  * Add Todo
  */
 addTodo(todoForm) {
   if (todoForm.valid) {
     this.todo.dueDate = this.dueDateRef.flatpickrElement.nativeElement.children[0].value;
     this.closeSidebar();
   }
 }
 deleteTodo() {
   this.todo.deleted = !this.todo.deleted;
   this.closeSidebar();
 }

 toggleComplete() {
   this.todo.completed = !this.todo.completed;
   this.closeSidebar();
 }

 /**
  * Toggle Important
  */
 toggleImportant() {
   this.todo.important = !this.todo.important;
   this.closeSidebar();
 }

 ngOnInit(): void {
   this.selectAssignee=[{id:1,name:'John Doe'},{id:2,name:'Jane Doe'}];

 }

}
