import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewPersonnelSidebarComponent } from './new-personnel-sidebar.component';

describe('NewPersonnelSidebarComponent', () => {
  let component: NewPersonnelSidebarComponent;
  let fixture: ComponentFixture<NewPersonnelSidebarComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewPersonnelSidebarComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewPersonnelSidebarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
