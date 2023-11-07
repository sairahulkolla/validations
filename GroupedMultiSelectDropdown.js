import React, { useState } from 'react';
import {
  FormControl,
  InputLabel,
  Select,
  MenuItem,
  Checkbox,
} from '@mui/material';

const GroupedMultiSelectDropdown = () => {
  const [selectedValues, setSelectedValues] = useState([]);

  const handleChange = (event) => {
    setSelectedValues(event.target.value);
  };

  const groupedOptions = [
    {
      label: 'Group 1',
      options: ['Option 1', 'Option 2', 'Option 3'],
    },
    {
      label: 'Group 2',
      options: ['Option 4', 'Option 5', 'Option 6'],
    },
  ];

  return (
    <FormControl fullWidth>
      <InputLabel id="grouped-multi-select-dropdown-label">Select Options</InputLabel>
      <Select
        labelId="grouped-multi-select-dropdown-label"
        id="grouped-multi-select-dropdown"
        multiple
        value={selectedValues}
        onChange={handleChange}
        renderValue={(selected) => selected.join(', ')}
      >
        {groupedOptions.map((group) => (
          <optgroup key={group.label} label={group.label}>
            {group.options.map((option) => (
              <MenuItem key={option} value={option}>
                <Checkbox checked={selectedValues.includes(option)} />
                {option}
              </MenuItem>
            ))}
          </optgroup>
        ))}
      </Select>
    </FormControl>
  );
};

export default GroupedMultiSelectDropdown;
