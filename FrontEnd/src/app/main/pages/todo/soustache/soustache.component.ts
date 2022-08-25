import { Component, OnInit, ViewEncapsulation, ElementRef, ViewChild } from '@angular/core';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import { SousSousTachesService } from '@core/services/sous-taches.service';
import { SousTaches } from '@core/sous-taches';
import { AuthenticationService } from 'app/auth/services';
import $ from 'jquery';
import Swal from 'sweetalert2';
@Component({
  selector: 'app-soustache',
  templateUrl: './soustache.component.html',
  styleUrls: ['./soustache.component.scss'],
  encapsulation: ViewEncapsulation.None
})
export class SoustacheComponent implements OnInit {
  idtache: any;
  idsoustache: any;
  soustachedetaille:SousTaches;

 /**
   * Constructor
   *
   * 
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor(private us:AuthenticationService,private _coreSidebarService: CoreSidebarService,private st:SousSousTachesService) {
    this.soustache = new SousTaches();
    this.soustachedetaille= new SousTaches();
   }
 /**
   * Close Sidebar
   */
  commentaire:any
  public listtaches=true;
  public ajoutertache
  soustache:SousTaches
  SousTachesList
  AS_SousTaches
  closeSidebar() {
    this._coreSidebarService.getSidebarRegistry('soustache').toggleOpen();
  }
  FindAllAssignee(){
    this.us.FindAll().subscribe(
      (data: any) => {
        this.AS_SousTaches=data.users;
        console.log("Liste des assignés")
        console.log(this.AS_SousTaches)
      }
    )
  }
  FindAllSousTaches(){
    this.st.FindAllSousTaches().subscribe(data=>{
      this.SousTachesList=data.soustaches;
      console.log("List des Sous Taches : ",this.SousTachesList)
    })
  }
  UpdateTache(){
    this.st.UpdateTache(this.soustachedetaille).subscribe(
      (data: any) => {
        Swal.fire({
          title: '<strong>Success!</strong>',
          icon: 'success',
          html:
            '<b>Congratulations !</b> You Updated The SousTache '
        }
        )
        console.log(data)
      }
    );
  }
  ngOnInit(): void {
    $('#soustaches').show();
    $('#comments').hide();
    $('#AjouterSousTache').hide();
    $('#DetailleSousTache').hide();
    this.FindAllAssignee();
    this.FindAllSousTaches();
    //
    
  }
  //show commentaires
  showCommentaires(){
    $('#comments').show();
    $('#soustaches').hide();
    $('#AjouterSousTache').hide();
    $('#DetailleSousTache').hide();
    //
    $('#TC').addClass('active');
    $('#TA').removeClass('active');
    $('#TS').removeClass('active');
  }
  //show soustaches
  showSousTaches(){
    this.FindAllSousTaches();
    $('#soustaches').show();
    $('#comments').hide();
    $('#AjouterSousTache').hide();
    $('#DetailleSousTache').hide();
    //
    $('#TS').addClass('active');
    $('#TC').removeClass('active');
    $('#TA').removeClass('active');
  }
  //show ajouter
  showAjouter(){
    this.FindAllAssignee();
    $('#soustaches').hide();
    $('#comments').hide();
    $('#AjouterSousTache').show();
    $('#DetailleSousTache').hide();
    //
    $('#TA').addClass('active');
    $('#TC').removeClass('active');
    $('#TS').removeClass('active');
  }
  showDetailleSousTache(st){
    this.FindSousTacheById(st);
    $('#DetailleSousTache').show();
    $('#soustaches').hide();
    $('#comments').hide();
    $('#AjouterSousTache').hide();
  }
  HideDetailleSousTache(){
    $('#soustaches').show();
    $('#comments').hide();
    $('#AjouterSousTache').hide();
    $('#DetailleSousTache').hide();
  }
  //
  AjouterSousTache() {
    this.soustache.file="Not Yet Ready";
    this.soustache.image="Not Yet Ready";
    this.soustache.assignation=this.soustache.assignation.id;
    //change id
    this.soustache.tache_id=1;
    console.log(this.soustache)
    this.st.save(this.soustache).subscribe(
      (data: any) => {
        Swal.fire({
          title: '<strong>Success!</strong>',
          icon: 'success',
          html:
            '<b>Congratulations !</b> You Added The SousTache '
        }
        )
        console.log(data)
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
  //
  getSousTacheDetailles() {
    /*this._coreSidebarService.currentid.subscribe((message) => {
      this.idsoustache= message  
      console.log("id de la tache"+this.idsoustache)
      //FindById
      this.FindSousTacheById(this.idsoustache)
    }); */
    
  }
  FindSousTacheById(id){
    this.st.FindSousTacheById(id).subscribe(
      (data: any) => {
        this.soustachedetaille=data.soustache;
        console.log(this.idsoustache)
      }
    )
  }
}
