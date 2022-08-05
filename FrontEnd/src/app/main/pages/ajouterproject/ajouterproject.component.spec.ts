import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AjouterprojectComponent } from './ajouterproject.component';

describe('AjouterprojectComponent', () => {
  let component: AjouterprojectComponent;
  let fixture: ComponentFixture<AjouterprojectComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AjouterprojectComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AjouterprojectComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
