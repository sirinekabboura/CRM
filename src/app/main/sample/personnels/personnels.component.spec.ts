import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PersonnelsComponent } from './personnels.component';

describe('PersonnelsComponent', () => {
  let component: PersonnelsComponent;
  let fixture: ComponentFixture<PersonnelsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PersonnelsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(PersonnelsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
