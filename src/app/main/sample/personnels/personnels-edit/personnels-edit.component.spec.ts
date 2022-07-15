import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PersonnelsEditComponent } from './personnels-edit.component';

describe('PersonnelsEditComponent', () => {
  let component: PersonnelsEditComponent;
  let fixture: ComponentFixture<PersonnelsEditComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PersonnelsEditComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(PersonnelsEditComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
