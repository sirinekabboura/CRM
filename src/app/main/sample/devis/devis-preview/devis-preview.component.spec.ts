import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DevisPreviewComponent } from './devis-preview.component';

describe('DevisPreviewComponent', () => {
  let component: DevisPreviewComponent;
  let fixture: ComponentFixture<DevisPreviewComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DevisPreviewComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DevisPreviewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
