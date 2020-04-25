import { OmegaUp } from '../omegaup';
import * as time from '../time';
import { types } from '../api_types';
import T from '../lang';
import Vue from 'vue';
import SubmissionsVisualizer from '../components/arena/SubmissionsVisualizer.vue';

import {
  EphemeralGrader,
  EventsSocket,
  GetOptionsFromLocation,
  myRunsStore,
  runsStore,
} from './arena_transitional';

OmegaUp.on('ready', () => {
  time.setSugarLocale();

  const submissionsVisualizer = new Vue({
    el: '#submissions-visualizer',
    render: function(createElement) {
      return createElement('omegaup-submissions-visualizer', {
        props: {
          runs: [
            {
              submissionId: 'id1',
              contestantId: 'MEX-3',
              medal: 'bronze',
              rank: 10,
              contestantName: "Edgar Augusto Santiago Nieves",
              problemId: 'A',
              verdict: 'WA',
              totalScore: 342,
              submissionScore: 0,
            },
            {
              submissionId: 'id2',
              contestantId: 'MDF-2',
              medal: undefined,
              rank: 100,
              contestantName: "Félix Rafael Horta Cuadrilla",
              problemId: 'B',
              verdict: 'AC',
              totalScore: 132,
              submissionScore: 100,
            },
            {
              submissionId: 'id3',
              contestantId: 'WAT-4',
              medal: 'silver',
              rank: 122,
              contestantName: "Anju Del Moral González",
              problemId: 'A',
              verdict: undefined,
              totalScore: 999,
              submissionScore: undefined,
            },
            {
              submissionId: 'id4',
              contestantId: 'ZAC-1',
              medal: 'gold',
              rank: 2,
              contestantName: "Jordan Alexander Salas",
              problemId: 'C',
              verdict: 'PA',
              totalScore: 34,
              submissionScore: 49,
            },
          ]
        },
      });
    },
    data: {
    },
    components: { 'omegaup-submissions-visualizer': SubmissionsVisualizer },
  });
});
