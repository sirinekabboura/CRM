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
import { NgbDropdownItem, NgbDropdownMenu, NgbModule, NgbNavModule } from '@ng-bootstrap/ng-bootstrap';
import { ClientComponent } from './client/client.component';
import { ClientEditComponent } from './client/client-edit/client-edit.component';
import { NewClientSidebarComponent } from './client/new-client-sidebar/new-client-sidebar.component';
import { DevisComponent } from './devis/devis.component';
import { DevisAddComponent } from './devis/devis-add/devis-add.component';
import { FormsModule } from '@angular/forms';
import { CorePipesModule } from '@core/pipes/pipes.module';
import { NgxDatatableModule } from '@swimlane/ngx-datatable';
import { NgSelectModule } from '@ng-select/ng-select';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { Ng2FlatpickrModule } from 'ng2-flatpickr';
import { DevisPreviewComponent } from './devis/devis-preview/devis-preview.component';
import { DevisEditComponent } from './devis/devis-edit/devis-edit.component';
import { FactureComponent } from './facture/facture.component';
import { FactureAddComponent } from './facture/facture-add/facture-add.component';
import { FacturePreviewComponent } from './facture/facture-preview/facture-preview.component';
import { FactureEditComponent } from './facture/facture-edit/facture-edit.component';
import { TicketComponent } from './ticket/ticket.component';
import { TicketDetailsComponent } from './ticket/ticket-details/ticket-details.component';
import { PerfectScrollbarModule } from 'ngx-perfect-scrollbar';


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
    path: 'devis',
    component: DevisComponent,
    data: { animation: 'devis' }
  },
  {
    path: 'devis-add',
    component: DevisAddComponent,
    data: { animation: 'devis-add' }
  },
  {
    path: 'devis-preview',
    component: DevisPreviewComponent,
    data: { animation: 'devis-preview' }
  },
  {
    path: 'devis-edit',
    component: DevisEditComponent,
    data: { animation: 'devis-edit' }
  },
  {
    path: 'invoice',
    component: FactureComponent,
    data: { animation: 'invoice' }
  },
  {
    path: 'facture-add',
    component: FactureAddComponent,
    data: { animation: 'facture-add' }
  },
  {
    path: 'facture-preview',
    component: FacturePreviewComponent,
    data: { animation: 'facture-preview' }
  },
  {
    path: 'facture-edit',
    component: FactureEditComponent,
    data: { animation: 'facture-edit' }
  },
  {
    path: 'ticket',
    component: TicketComponent,
    data: { animation: 'ticket' }
  },
  {
    path: 'ticket-details',
    component: TicketDetailsComponent,
    data: { animation: 'ticket-details' }
  }
];

@NgModule({
  declarations: [SampleComponent, HomeComponent, PersonnelsComponent, NewPersonnelSidebarComponent, PersonnelsEditComponent, ClientComponent, NewClientSidebarComponent, ClientEditComponent, DevisComponent, DevisAddComponent, DevisPreviewComponent, DevisEditComponent, FactureComponent, FactureAddComponent, FacturePreviewComponent, FactureEditComponent, TicketComponent, TicketDetailsComponent],
  imports: [RouterModule.forChild(routes), ContentHeaderModule, TranslateModule,NgbNavModule,
    CoreCommonModule,
    CoreModule.forRoot(coreConfig),
    CoreSidebarModule,
    CoreThemeCustomizerModule,
    CardSnippetModule,
    PerfectScrollbarModule,
    Ng2FlatpickrModule,
    NgxDatatableModule,
    FormsModule,
    CorePipesModule,
    NgbModule,
    NgSelectModule,
    BrowserAnimationsModule
  ],
  exports: [SampleComponent, HomeComponent,PersonnelsComponent,PersonnelsEditComponent]
})
export class SampleModule {}
