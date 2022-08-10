import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TacheDetaillesComponent } from './tache-detailles.component';

describe('TacheDetaillesComponent', () => {
  let component: TacheDetaillesComponent;
  let fixture: ComponentFixture<TacheDetaillesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TacheDetaillesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(TacheDetaillesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
