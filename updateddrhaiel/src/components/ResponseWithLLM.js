import LinkChip from "./basic/LinkChip";

function ResponseWithLLM({ llmRes }) {
    // console.log(llmRes);
    return <>
        <h5 style={{ marginTop: 8, marginBottom: 8 }}>Learn more:
            {
                llmRes.refs.map((ref, index) => <LinkChip url={ref.url} index={index} key={index} />)
            }
        </h5>
    </>
}


export default ResponseWithLLM;