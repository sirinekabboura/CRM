import { Component, OnInit, ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import { TachesService } from '@core/services/taches.service';
import { Taches } from '@core/taches';
import { AuthenticationService } from 'app/auth/services';
import Swal from 'sweetalert2';
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
 public tache: Taches;
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
  idtache: number;

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
 UpdateTache() {
  this.tache.file="Not Yet Ready";
  this.tache.image="Not Yet Ready";
  this.tache.soustache_id="Does Not Have Sous Tache";
  this.tache.assignation=this.tache.assignation.id;
  console.log(this.tache)
  this.PS.UpdateTache(this.tache).subscribe(
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
getTacheDetailles() {
  this._coreSidebarService.currentid.subscribe((message) => {
    this.idtache= message  
    console.log("id de la tache"+this.idtache)
    //FindById
    this.FindTacheById(this.idtache)
  }); 
}
FindTacheById(id){
  this.PS.FindTacheById(id).subscribe(
    (data: any) => {
      this.tache=data.tache;
      console.log(this.tache)
    }
  )
}
FindAllAssignee(){
  this.us.FindAll().subscribe(
    (data: any) => {
      this.selectAssignee=data.users;
      console.log("Liste des assignés")
      console.log(this.selectAssignee)
    }
  )
}
 async ngOnInit() {
   this.getTacheDetailles();
   this.FindAllAssignee();


 }

}
