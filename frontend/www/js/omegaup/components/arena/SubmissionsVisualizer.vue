<template>
  <table className="judge-queue">
    <tbody>
      <tbody>
        <tr v-for="run in runs" :key="run.id" class="judge-submission" :class="{ blink: true }">
          <td :class="run.medal">{{run.rank}}</td>
          <td>{{run.contestantId}}</td>
          <td className="align-left">{{run.contestantName}}</td>
          <td>{{run.totalScore}}</td>
          <td>{{run.problemId}}</td>
          <td>{{run.verdict !== undefined ? run.verdict : '?'}}</td>
          <td>{{run.submissionScore !== undefined ? run.submissionScore : '?'}}</td>
        </tr>
      </tbody>
    </tbody>
  </table>
</template>

<style>
* {
  color: #ffffff;
  opacity: 0.95;
  font-size: 15pt;
  font-family: sans-serif;
}

body {
  padding: 0;
  margin: 0;
  height: 100vh;
  display: flex;
  align-items: flex-end;
}

.judge-queue {
  border-collapse: collapse;
  border: 0px;
}

.judge-submission:nth-child(even) {
  background-color: #2a2c2e;
}

.judge-submission:nth-child(odd) {
  background-color: #000000;
}

.judge-submission td:first-child {
  background-color: #000000;
}

.judge-submission td.gold {
  background-color: #726700;
}

.judge-submission td.silver {
  background-color: #7c7c7c;
}

.judge-submission td.bronze {
  background-color: #866c45;
}

.judge-submission {
  text-align: center;
}

.judge-submission .align-left {
  text-align: left;
}

.judge-submission td {
  padding: .1em .3em;
}

@keyframes blinker {
  from { opacity: 1.0; }
  to { opacity: 0.0; }
}

.blink td {
	text-decoration: blink;
	animation-name: blinker;
	animation-duration: 0.6s;
	animation-iteration-count: infinite;
	animation-timing-function: ease-in-out;
	animation-direction: alternate;
}
</style>

<script lang="ts">
import { Vue, Component, Prop } from 'vue-property-decorator';
import { omegaup } from '../../omegaup';
import T from '../../lang';
import * as UI from '../../ui';

@Component
export default class SubmissionsVisualizer extends Vue {
  @Prop() runs!: {
    submissionId: string;
    rank: number;
    medal: string;
    contestantId: string;
    contestantName: string;
    problemId: string;
    verdict: string | undefined;
    submissionScore: number | undefined;
    totalScore: number;
  }[];
}
</script>
