import { Component, OnInit } from '@angular/core';
import { Comment } from '@core/comment';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import { CommentService } from '@core/services/comment.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-taches-comments',
  templateUrl: './taches-comments.component.html',
  styleUrls: ['./taches-comments.component.scss']
})
export class TachesCommentsComponent implements OnInit {
 /**
   * Constructor
   *
   * 
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor(private _coreSidebarService: CoreSidebarService,private cc:CommentService) {
    this.commentaire=new Comment();
   }
   currentUser: any;
  commentaire:Comment
  ngOnInit(): void {
  }
  closeSidebar() {
    this._coreSidebarService.getSidebarRegistry('soustache').toggleOpen();
  }
  AjouterCommentaire() {
    this.currentUser = JSON.parse(localStorage.getItem('currentUser'));
    this.commentaire.image="Not Yet Ready";
    this.commentaire.id_user=this.currentUser.id;
    this.commentaire.id_tache=this.commentaire.id_tache;

    console.log(this.commentaire)
    this.cc.save(this.commentaire).subscribe(
      (data: any) => {
        Swal.fire({
          title: '<strong>Success!</strong>',
          icon: 'success',
          html:
            '<b>Congratulations !</b> You Added The Commentaire '
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
}
