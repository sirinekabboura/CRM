import { Component, OnInit } from '@angular/core';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ClientsService } from 'app/services/clients.service';
import { ToastrService } from 'ngx-toastr';
import { Router } from '@angular/router';
@Component({
  selector: 'app-new-client-sidebar',
  templateUrl: './new-client-sidebar.component.html',
  styleUrls: ['./new-client-sidebar.component.scss']
})
export class NewClientSidebarComponent implements OnInit {

  public persPhys:any = ['man','women'];
  public fullname;
  public number;
  public email;
  public RS;
  public adresse;
  public RNE;
  public personnePhysique;

  public registerSucess:boolean = false;
  registerForm: FormGroup;
  submitted = false;
  clients: any;
  value1: any;
  radioSelectedString: string;




  /**
   * Constructor
   *
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor(private toastr: ToastrService,private router: Router,
    private _coreSidebarService: CoreSidebarService,private formBuilder: FormBuilder,private clientService: ClientsService) {
      //this.getSelecteditem();
    }

  /**
   * Toggle the sidebar
   *
   * @param name
   */
  toggleSidebar(name): void {
    this._coreSidebarService.getSidebarRegistry(name).toggleOpen();
  }



  /**
   * Submit
   *
   * @param form
   */
  submit(form) {
    if (form.valid) {
      alert('Success');
      this.toggleSidebar('new-client-sidebar');
    }
  }

  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      fullName: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      number: ['', [Validators.required, Validators.minLength(6)]],
      adresse: ['', Validators.required],
      RNE: ['', Validators.required],
      RS: ['', Validators.required],
      personnePhysique: ['', Validators.required]
  });
  //console.log(this.value);
   //this.radioChangeHandler(event);
  //this.onItemChange(event);
  //this.changeGender(event);
  
  }

  get f() { return this.registerForm.controls; }

  radioChangeHandler(event: any){
   this.value1=(event.target as HTMLInputElement).value;
    console.log(this.value1);
    //this.getSelecteditem();

  }
  
 
  add(clientName: string,clientEmail: string,clientNumber: number,clientAdresse: string,clientRS: string,RNE: string)
  {
    this.submitted = true;

      // stop here if form is invalid
      if (this.registerForm.invalid) {
          return;
      }
            // display form values on success
            else{
              

              this.clients= {
                'name':clientName,
                'email':clientEmail,
                'Numtelephone':clientNumber,
                'Adresse':clientAdresse,
                'RaisonSociale':clientRS,
                'RNE':RNE,
                'PersonnePhysique':'men'
              }
              this.clientService.addClients(this.clients as any).subscribe(client=>{
                var r :any=client;
                this.toastr.success(r.message,'Client added with success');
                this.clients=client;
                this.router.navigateByUrl('/client');
              });
              console.log(this.clients);
            }
  }

  onReset() {
      this.submitted = false;
      this.registerForm.reset();
  }
  
  /*getSelecteditem(){
    this.value = this.persPhys.find(Item => Item.value === "male");
    this.radioSelectedString = JSON.stringify(this.value);
  }*/

}
