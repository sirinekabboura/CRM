import { Component, OnInit, ViewChild } from '@angular/core';
import { CoreSidebarService } from '@core/components/core-sidebar/core-sidebar.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { PersonnelsService } from 'app/services/personnels.service';
import { ToastrService } from 'ngx-toastr';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-new-personnel-sidebar',
  templateUrl: './new-personnel-sidebar.component.html',
  styleUrls: ['./new-personnel-sidebar.component.scss']
})
export class NewPersonnelSidebarComponent implements OnInit {
  public fullname;
  public username;
  public email;
  public num;
  public salaire;
  public etat;
  public IDcard;
  public adresse;
  personnels: any;
  public registerSucess:boolean = false;
  registerForm: FormGroup;
  submitted = false;
  public selectMulti: any[] = [];
  public selectMultiSelected = [{ name: 'Karyn Wright' }];






  /**
   * Constructor
   *
   * @param {CoreSidebarService} _coreSidebarService
   */
  constructor(private toastr: ToastrService,private router: Router,
    private _coreSidebarService: CoreSidebarService,private formBuilder: FormBuilder,private personnalService: PersonnelsService) {}

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
      this.toggleSidebar('new-personnel-sidebar');
    }
  }

  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      fullName: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      number: ['', [Validators.required, Validators.maxLength(8)]],
      adresse: ['', Validators.required],
      IDcard: ['', Validators.required],
      Role: ['', Validators.required],
      salaire: ['', Validators.required],
  });

  this.selectMulti = ['Developpeur fullstack,Developpeur web,Developpeur mobile,Developpeur backend','Developpeur frontend'];
  }

  get f() { return this.registerForm.controls; }

  onReset() {
      this.submitted = false;
      this.registerForm.reset();
  }

  add2(personnelName: string,personnelEmail: string,personnelNumber: string,personnelIDcard: number,personnelRole: string,personnelSalary:number,personnelAdresse: string)
  {
    this.submitted = true;
     // stop here if form is invalid
     if (this.registerForm.invalid) {
      return;
  }
        // display form values on success
  else{
    this.personnels= {
      'name':personnelName,
      'email':personnelEmail,
      'Numtelephone':personnelNumber,
      'CarteID':personnelIDcard,
      'Role':personnelRole,
      'Salaire':personnelSalary,
      'Adresse':personnelAdresse
    }
    this.personnalService.addPersonnels(this.personnels as any).subscribe(personnel=>{
      var r :any=personnel;
      this.toastr.success(r.message,'personnal added with success');
      this.personnels=personnel;
      this.router.navigateByUrl('/personnels');

    });
    console.log(this.personnels);
  }
}

}
