import { TestBed } from '@angular/core/testing';

import { PersonnelsEditService } from './personnels-edit.service';

describe('PersonnelsEditService', () => {
  let service: PersonnelsEditService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(PersonnelsEditService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
