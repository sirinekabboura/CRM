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
}

