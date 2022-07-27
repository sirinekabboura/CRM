import { RouterModule } from '@angular/router';
import { TranslateModule } from '@ngx-translate/core';

import { CoreCommonModule } from '@core/common.module';
import { CoreModule } from '@core/core.module';
import { CoreSidebarModule, CoreThemeCustomizerModule } from '@core/components';
import { CardSnippetModule } from '@core/components/card-snippet/card-snippet.module';
import { coreConfig } from 'app/app-config';


import { ContentHeaderModule } from 'app/layout/components/content-header/content-header.module';

import { SampleComponent } from './sample.component';
import { HomeComponent } from './home.component';
import { PersonnelsComponent } from './personnels/personnels.component';
import { NewPersonnelSidebarComponent } from './personnels/new-personnel-sidebar/new-personnel-sidebar.component';
import { PersonnelsEditComponent } from './personnels/personnels-edit/personnels-edit.component';
import { NgModule } from '@angular/core';
import { NgbNavModule } from '@ng-bootstrap/ng-bootstrap';
import { ClientComponent } from './client/client.component';
import { ClientEditComponent } from './client/client-edit/client-edit.component';
import { NewClientSidebarComponent } from './client/new-client-sidebar/new-client-sidebar.component';
import { TeamComponent } from './team/team.component';
import { NewTeamSidebarComponent } from './team/new-team-sidebar/new-team-sidebar.component';
import { TeamEditComponent } from './team/team-edit/team-edit.component';

const routes = [
  {
    path: 'sample',
    component: SampleComponent,
    data: { animation: 'sample' }
  },
  {
    path: 'home',
    component: HomeComponent,
    data: { animation: 'home' }
  },
  {
    path: 'personnels',
    component: PersonnelsComponent,
    data: { animation: 'personnels' }
  },
  {
    path: 'personnels-edit',
    component: PersonnelsEditComponent,
    data: { animation: 'personnels-edit' }
  },
  {
    path: 'client',
    component: ClientComponent,
    data: { animation: 'client' }
  },
  {
    path: 'client-edit',
    component: ClientEditComponent,
    data: { animation: 'client-edit' }
  },
  {
    path: 'team',
    component: TeamComponent,
    data: { animation: 'team' }
  },
  {
    path: 'team-edit',
    component: TeamEditComponent,
    data: { animation: 'team-edit' }
  }
  
];

@NgModule({
  declarations: [SampleComponent, HomeComponent, PersonnelsComponent, NewPersonnelSidebarComponent, PersonnelsEditComponent, ClientComponent, NewClientSidebarComponent, ClientEditComponent, TeamComponent, NewTeamSidebarComponent, TeamEditComponent],
  imports: [RouterModule.forChild(routes), ContentHeaderModule, TranslateModule,NgbNavModule,
    CoreCommonModule,
    CoreModule.forRoot(coreConfig),
    CoreSidebarModule,
    CoreThemeCustomizerModule,
    CardSnippetModule],
  exports: [SampleComponent, HomeComponent,PersonnelsComponent,PersonnelsEditComponent]
})
export class SampleModule {}
