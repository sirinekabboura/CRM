import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { NgSelectModule } from '@ng-select/ng-select';
import { CoreCommonModule } from '@core/common.module';
import { ContentHeaderModule } from 'app/layout/components/content-header/content-header.module';

import { AuthenticationModule } from './authentication/authentication.module';
import { MiscellaneousModule } from './miscellaneous/miscellaneous.module';
import { ForgotpasswordComponent } from './forgotpassword/forgotpassword.component';
import { ProjectsComponent } from './projects/projects.component';
import { ProjectslistComponent } from './projectslist/projectslist.component';
import { AjouterprojectComponent } from './ajouterproject/ajouterproject.component';




@NgModule({
  declarations: [
  
    ForgotpasswordComponent,
       ProjectsComponent,
       ProjectslistComponent,
       AjouterprojectComponent,
  ],
  imports: [
    CommonModule,
    CoreCommonModule,
    ContentHeaderModule,
    NgbModule,
    NgSelectModule,
    FormsModule,
    AuthenticationModule,
    MiscellaneousModule
  ],

  providers: []
})
export class PagesModule {}
