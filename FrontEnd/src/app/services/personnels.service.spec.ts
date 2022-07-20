import { TestBed } from '@angular/core/testing';

import { PersonnelsService } from './personnels.service';

describe('PersonnelsService', () => {
  let service: PersonnelsService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(PersonnelsService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
