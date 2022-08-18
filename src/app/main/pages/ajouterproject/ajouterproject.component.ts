import { AfterViewInit, Component, ElementRef, OnInit, TemplateRef, ViewChild } from '@angular/core';
import {NgbModal, ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap'
import Stepper from 'bs-stepper';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-ajouterproject',
  templateUrl: './ajouterproject.component.html',
  styleUrls: ['./ajouterproject.component.scss']
})

export class AjouterprojectComponent implements OnInit,AfterViewInit {
  show=false;
  private stepper: Stepper;
  closeResult: string = '';
  private bsStepper;
     
  /*------------------------------------------
  --------------------------------------------
  Created constructor
  --------------------------------------------
  --------------------------------------------*/
  constructor(private modalService: NgbModal) {}
     
  /**
   * Write code on Method
   *
   * @return response()
   */
   @ViewChild('mymodal') templateRef: TemplateRef<any>;
  open(content:any) {

    this.modalService.open(content, {ariaLabelledBy: 'modal-basic-title',size: 'lg'}).result.then((result) => {
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
      return  `with: ${reason}`;
    }
  }
  test(){
    Swal.fire({
      title: "<i>Title</i>", 
      html: "<ng-container #modals *ngTemplateOutlet='mymodal' > </ng-container>",  
      confirmButtonText: 'V <u>redu</u>', 
    });
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
  
    /*
    this.stepper = new Stepper(document.querySelector('#steppeur'), {
      linear: false,
      animation: true
    });*/
    
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
  }
}
  
