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
  
];

@NgModule({
  declarations: [SampleComponent, HomeComponent, PersonnelsComponent, NewPersonnelSidebarComponent, PersonnelsEditComponent],
  imports: [RouterModule.forChild(routes), ContentHeaderModule, TranslateModule,NgbNavModule,
    CoreCommonModule,
    CoreModule.forRoot(coreConfig),
    CoreSidebarModule,
    CoreThemeCustomizerModule,
    CardSnippetModule],
  exports: [SampleComponent, HomeComponent,PersonnelsComponent,PersonnelsEditComponent]
})
export class SampleModule {}
