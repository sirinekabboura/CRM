import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TachesCommentsComponent } from './taches-comments.component';

describe('TachesCommentsComponent', () => {
  let component: TachesCommentsComponent;
  let fixture: ComponentFixture<TachesCommentsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TachesCommentsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(TachesCommentsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
