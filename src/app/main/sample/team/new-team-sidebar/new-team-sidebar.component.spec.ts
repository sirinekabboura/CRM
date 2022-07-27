import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewTeamSidebarComponent } from './new-team-sidebar.component';

describe('NewTeamSidebarComponent', () => {
  let component: NewTeamSidebarComponent;
  let fixture: ComponentFixture<NewTeamSidebarComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewTeamSidebarComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewTeamSidebarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
