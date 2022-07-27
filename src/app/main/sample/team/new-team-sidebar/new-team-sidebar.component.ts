import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";
import {CoreSidebarService} from "../../../../../@core/components/core-sidebar/core-sidebar.service";
import {TeamService} from "../team.service";

@Component({
  selector: 'app-new-team-sidebar',
  templateUrl: './new-team-sidebar.component.html',
  styleUrls: ['./new-team-sidebar.component.scss']
})
export class NewTeamSidebarComponent implements OnInit {
  //public  datecreation;
  public pseudo;
  public codeTeam;
  public registerSucess:boolean = false;
  registerForm: FormGroup;
  submitted = false;

  constructor(private _coreSidebarService: CoreSidebarService,private formBuilder: FormBuilder,private teamService: TeamService) {}
  toggleSidebar(name): void {
    this._coreSidebarService.getSidebarRegistry(name).toggleOpen();
  }
  submit(form) {
    if (form.valid) {
      alert('Success');
      this.toggleSidebar('new-team-sidebar');
    }
  }

  ngOnInit(): void {
    this.registerForm = this.formBuilder.group({
      pseudo: ['', Validators.required],
      teamCode: ['', [Validators.required, Validators.minLength(6)]],
      confirmteamCode: ['', Validators.required],
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
      this.toggleSidebar('new-team-sidebar');

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

