import { AfterViewInit, Component, ElementRef, OnInit, TemplateRef, ViewChild } from '@angular/core';
import { NgbModal, ModalDismissReasons } from '@ng-bootstrap/ng-bootstrap'
import Stepper from 'bs-stepper';
import Swal from 'sweetalert2';
import $ from 'jquery';
import { Project } from '@core/project';
import { ProjectServiceService } from '@core/services/project-service.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-ajouterproject',
  templateUrl: './ajouterproject.component.html',
  styleUrls: ['./ajouterproject.component.scss']
})

export class AjouterprojectComponent implements OnInit, AfterViewInit {
  show = false;
  private stepper: Stepper;
  closeResult: string = '';
  private bsStepper;

  project: Project
  /*------------------------------------------
  --------------------------------------------
  Created constructor
  --------------------------------------------
  --------------------------------------------*/
  constructor(private modalService: NgbModal, private PS: ProjectServiceService, private router: Router) { 
    this.project=new Project();
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  @ViewChild('mymodal') templateRef: TemplateRef<any>;
  open(content: any) {

    this.modalService.open(content, { ariaLabelledBy: 'modal-basic-title', size: 'lg' }).result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
    });

  }




  /**
   * Write code on Method
   *
   * @return response()
   */
  private getDismissReason(reason: any): string {
    if (reason === ModalDismissReasons.ESC) {
      return 'by pressing ESC';
    } else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
      return 'by clicking on a backdrop';
    } else {
      return `with: ${reason}`;
    }
  }
  test() {
    Swal.fire({
      title: "<i>Title</i>",
      html: "<ng-container #modals *ngTemplateOutlet='mymodal' > </ng-container>",
      confirmButtonText: 'V <u>redu</u>',
    });
  }
  AjouterProject() {
    this.project.filecvc="Not Yet Ready";
    console.log(this.project)
    this.PS.save(this.project).subscribe(
      (data: any) => {
        Swal.fire({
          title: '<strong>Success!</strong>',
          icon: 'success',
          html:
            '<b>Congratulations !</b> You Added The Project '
        }
        )
        console.log(data)
        this.router.navigateByUrl('/projectslist/All')
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
  onSubmit() {
    alert('Submitted!!');
    return false;
  }
  ngOnInit(): void {
    this.stepper = new Stepper(document.querySelector('#plizman'), {
      linear: false,
      animation: true
    });
    this.next();
    this.previous();

  }
  next() {
    this.stepper.next();
  }
  previous() {
    this.stepper.previous();
  }
  ngAfterViewInit() {
    this.stepper = new Stepper(document.querySelector('#plizman'), {
      linear: false,
      animation: true
    });
    this.next();
    this.previous();
  }
  //project etat
  ProjectEtat(item){
    if(item=='Terminé'){
      this.project.etats='Terminé';
    }
    else if(item=='En Cours'){
      this.project.etats='En Cours';
    }
    else if(item=='Créé'){
      this.project.etats='Créé';
    }
    else if(item=='Affecté'){
      this.project.etats='Affecté';
    }

  }
  ProjectType(item){
    if(item=='Appweb'){
      this.project.Type='Appweb';
      console.log(this.project.Type)
    }
    else if(item=='CrossPlatforme'){
      this.project.Type='CrossPlatforme';
      console.log(this.project.Type)
    }
    else if(item=='Sitevetrine'){
      this.project.Type='Sitevetrine';
      console.log(this.project.Type)
    }
    else if(item=='Appmobile'){
      this.project.Type='Appmobile';
      console.log(this.project.Type)
    }
    else if(item=='Ecommerce'){
      this.project.Type='Ecommerce';
      console.log(this.project.Type)
    }
    else if(item=='Gestion Rsociaux'){
      this.project.Type='Gestion Rsociaux';
      console.log(this.project.Type)
    }
    else if(item=='DesigneGraphique'){
      this.project.Type='DesigneGraphique';
      console.log(this.project.Type)
    }
  }
  Framework(item){
    if(item=='Angular'){
      this.project.Frameworks='Angular';
      console.log(this.project.Frameworks)
    }
    else if(item=='React Native'){
      this.project.Frameworks='React Native';
      console.log(this.project.Frameworks)
    }
    else if(item=='Vue'){
      this.project.Frameworks='Vue';
      console.log(this.project.Frameworks)
    }
    else if(item=='Laravel'){
      this.project.Frameworks='Laravel';
      console.log(this.project.Frameworks)
    }
  }
  Database(item){
    if(item=='MySQL'){
      this.project.database='MySQL';
      console.log(this.project.database)
    }
    else if(item=='Firebase'){
      this.project.database='Firebase';
      console.log(this.project.database)
    }
    else if(item=='DynamoDB'){
      this.project.database='DynamoDB';
      console.log(this.project.database)
    }
  }

}

