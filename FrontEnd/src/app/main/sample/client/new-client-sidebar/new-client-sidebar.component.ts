import { Component, OnInit } from '@angular/core';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { PersonnelsService } from 'app/services/personnels.service';
@Component({
  selector: 'app-new-client-sidebar',
  templateUrl: './new-client-sidebar.component.html',
  styleUrls: ['./new-client-sidebar.component.scss']
})
export class NewClientSidebarComponent implements OnInit {

  public fullname;
  public username;
  public email;
  public num;
  public salaire;
  public etat;
  public registerSucess:boolean = false;
  registerForm: FormGroup;
  submitted = false;




  /**
   * Constructor
   *
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor(private _coreSidebarService: CoreSidebarService,private formBuilder: FormBuilder,private personnalService: PersonnelsService) {}

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
      title: ['', Validators.required],
      firstName: ['', Validators.required],
      lastName: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]],
      confirmPassword: ['', Validators.required],
      salaire: ['', Validators.required],
      RS: ['', Validators.required],
      personnePhysique: ['', Validators.required]
  });
  }

  get f() { return this.registerForm.controls; }

  

  add()
  {
    this.submitted = true;

      // stop here if form is invalid
      if (this.registerForm.invalid) {
          return;
      }
            // display form values on success
      else{
        alert('SUCCESS!! :-)\n\n' + JSON.stringify(this.registerForm.value, null, 4));
        this.toggleSidebar('new-client-sidebar');
  
        /**
         this.personnels={
          'name':personnelName,....
         }
         this.personnalService.addPersonnels(this.personnels as any).subscribe(personnel=>{
          this.personnels=personnel
         });
         console.log(this.personnels);
         */


      }
  }

  onReset() {
      this.submitted = false;
      this.registerForm.reset();
  }

}
