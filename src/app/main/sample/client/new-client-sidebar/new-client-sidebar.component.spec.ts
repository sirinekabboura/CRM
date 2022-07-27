import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewClientSidebarComponent } from './new-client-sidebar.component';

describe('NewClientSidebarComponent', () => {
  let component: NewClientSidebarComponent;
  let fixture: ComponentFixture<NewClientSidebarComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewClientSidebarComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewClientSidebarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
