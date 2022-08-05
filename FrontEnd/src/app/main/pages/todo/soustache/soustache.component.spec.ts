import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SoustacheComponent } from './soustache.component';

describe('SoustacheComponent', () => {
  let component: SoustacheComponent;
  let fixture: ComponentFixture<SoustacheComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SoustacheComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SoustacheComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
