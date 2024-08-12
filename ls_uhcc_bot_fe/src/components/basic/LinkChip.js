import { Link } from '@carbon/react';

function LinkChip({ url, index }) {
  return <Link href={url} target="_blank" style={{ marginLeft: 4, marginRight: 8 }} >
    {index + 1}
  </Link>
}

export default LinkChip;